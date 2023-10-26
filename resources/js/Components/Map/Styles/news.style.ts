import {Circle, Fill, Icon, Stroke, Style} from "ol/style";
import LightNewsData = App.Data.LightNewsData;
import PigeonData = App.Data.PigeonData;

const size = 32;

export function getNewsStyle(news: LightNewsData, pigeon: PigeonData): Style {
    const message = pigeon.news.find((pigeonNews) => pigeonNews.id === news.id)?.message;

    if (news?.user_id === pigeon?.user_id) {
        return newsBelongToUserStyle;
    }

    if (message?.is_arrived) {
        return newsArrivedStyle;
    }

    if (!pigeon.isTravelling) {
        return newsToGetStyle;
    }

    // travelling
    if (!message) {
        return newsDisabledStyle;
    }


    return newsTravellingStyle;
}

export const newsArrivedStyle: Style = new Style({
    image: new Circle({
        radius: size / 3,
        fill: new Fill({
            color: "#779DFF",
        }),
    }),
    zIndex: Infinity,
});

export const newsTravellingStyle: Style = new Style({
    image: new Icon({
        width: size,
        height: size,
        src: '/assets/images/pigeon-icon.png'
    }),
    zIndex: Infinity,
});

export const newsToGetStyle: Style = new Style({
    image: new Circle({
        radius: size / 3,
        fill: new Fill({
            color: "#322FCD",
        }),
    }),
    zIndex: Infinity,
});

export const newsDisabledStyle: Style = new Style({
    image: new Circle({
        radius: size / 3,
        fill: new Fill({
            color: "#625F5F",
        }),
    }),
    zIndex: Infinity,
});

export const newsBelongToUserStyle: Style = new Style({
    image: new Circle({
        radius: size / 3,
        fill: new Fill({
            color: "#F0B9DF",
        }),
    }),
    zIndex: Infinity,
});
