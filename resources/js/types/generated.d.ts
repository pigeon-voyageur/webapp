declare namespace App.Data {
    export type NewsData = {
        id: number;
        title: string;
        summary: string;
        video: string | null;
        lat: number;
        lng: number;
    };
    export type UserData = {
        id: number;
        name: string;
        email: string;
        email_verified_at: string;
    };
}
