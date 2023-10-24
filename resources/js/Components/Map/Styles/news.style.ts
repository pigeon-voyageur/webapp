import {Circle, Fill, Icon, Stroke, Style} from "ol/style";
import NewsData = App.Data.NewsData;
import PigeonData = App.Data.PigeonData;

const width = 5;

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
        radius: width * 2,
        fill: new Fill({
            color: "#FCF1DD",
        }),
        stroke: new Stroke({
            color: "#252525"
        })
    }),
    zIndex: Infinity,
});

export const newsTravellingStyle: Style = new Style({
    image: new Icon({
        // offset: [52, 0],
        // opacity: 0.5,
        scale: 0.2,
        src: '/assets/images/pigeon-icon.png'
    }),
    zIndex: Infinity,
});

export const newsToGetStyle: Style = new Style({
    image: new Circle({
        radius: width * 1.5,
        fill: new Fill({
            color: "#322FCD",
        }),
        stroke: new Stroke({
            color: "#FFFFFF",
            width: width
        })
    }),
    zIndex: Infinity,
});

export const newsDisabledStyle: Style = new Style({
    image: new Circle({
        radius: width * 1.5,
        fill: new Fill({
            color: "#625F5F",
        }),
        stroke: new Stroke({
            color: "#ABABAB",
            width: width
        })
    }),
    zIndex: Infinity,
});
