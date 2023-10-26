<?php

namespace Tests\Unit\Commands;

use App\Console\Commands\SendPigeonArrivedMails;
use App\Mail\PigeonArrivedMail;
use App\Models\News;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SendPigeonArrivedMailsTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_not_send_email_when_pigeon_travelling(): void
    {
        Mail::fake();
        $user = User::factory()->create();
        $news = News::factory()->create();
        $date = CarbonImmutable::create(2024, 01, 01, 12, 24, 0);
        $user->pigeon->news()->attach($news, ['arrival_date' => $date]);

        $this->travelTo($date->subSecond());
        Artisan::call(SendPigeonArrivedMails::class);

        Mail::assertNotSent(PigeonArrivedMail::class);
    }

    public function test_should_send_email_when_pigeon_arrived_recently(): void
    {
        Mail::fake();
        $user = User::factory()->create();
        $news = News::factory()->create();
        $date = CarbonImmutable::create(2024, 01, 01, 12, 24, 0);
        $user->pigeon->news()->attach($news, ['arrival_date' => $date]);

        $this->travelTo($date);
        Artisan::call(SendPigeonArrivedMails::class);

        Mail::assertSent(PigeonArrivedMail::class);
    }

    public function test_should_not_send_email_when_pigeon_arrived_anciently(): void
    {
        Mail::fake();
        $user = User::factory()->create();
        $news = News::factory()->create();
        $date = CarbonImmutable::create(2024, 01, 01, 12, 24, 0);
        $user->pigeon->news()->attach($news, ['arrival_date' => $date]);

        $this->travelTo($date->addMinute()->addSecond());
        Artisan::call(SendPigeonArrivedMails::class);

        Mail::assertNotSent(PigeonArrivedMail::class);
    }
}
