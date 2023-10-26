{{--@formatter:off--}}
{{--Do no indent content because it is markdown--}}
<x-mail::message>
# Votre pigeon est de retour !

Venez lire le message qu'il a rapporté lorsque vous avez le temps.

<x-mail::button :url="route('news.show', $news)">
    Voir le message
</x-mail::button>

Cordialement,<br>
{{ config('app.name') }}
</x-mail::message>
