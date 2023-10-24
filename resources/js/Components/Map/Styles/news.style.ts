import {Circle, Fill, Icon, Stroke, Style} from "ol/style";
import NewsData = App.Data.NewsData;
import PigeonData = App.Data.PigeonData;

const size = 32;

export function getNewsStyle(news: NewsData, pigeon: PigeonData): Style {
    const message = pigeon.news.find((pigeonNews) => pigeonNews.id === news.id)?.message;

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
            color: "#F5CEE9",
        }),
        stroke: new Stroke({
            color: "#FFFFFF",
            width: size / 4
        })
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
        stroke: new Stroke({
            color: "#FFFFFF",
            width: size / 4
        })
    }),
    zIndex: Infinity,
});

export const newsDisabledStyle: Style = new Style({
    image: new Circle({
        radius: size / 3,
        fill: new Fill({
            color: "#625F5F",
        }),
        stroke: new Stroke({
            color: "#ABABAB",
            width: size / 4
        })
    }),
    zIndex: Infinity,
});
