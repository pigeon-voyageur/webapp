declare namespace App.Data {
export type LightNewsData = {
id: number;
lat: number;
lng: number;
user_id: number;
};
export type LinkRowData = {
label: string;
url: string;
};
export type NewsCategoryData = {
id: number;
name: string;
title: string;
};
export type NewsData = {
id: number;
title: string;
news_category_id: number;
user_id: number;
category: App.Data.NewsCategoryData;
summary: string;
lat: number;
lng: number;
sources: Array<App.Data.LinkRowData>;
resources: Array<App.Data.LinkRowData>;
message: App.Data.PigeonMessageData | null;
};
export type PigeonData = {
id: number;
user_id: number;
created_at: string;
updated_at: string;
news: Array<App.Data.NewsData>;
isTravelling: boolean;
secondsToArrive: number;
};
export type PigeonMessageData = {
id: number;
pigeon_id: number;
news_id: number;
arrival_date: string;
is_read: boolean;
is_arrived: boolean;
};
export type TownData = {
id: number;
users: Array<App.Data.UserData>;
};
export type UserData = {
id: number;
name: string;
email: string;
email_verified_at: string | null;
pigeon?: App.Data.PigeonData;
};
}
