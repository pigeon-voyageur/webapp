declare namespace App.Data {
export type ParchmentData = {
id: number;
title: string;
summary: string;
video: string | null;
};
export type UserData = {
id: number;
name: string;
email: string;
email_verified_at: string;
};
}
