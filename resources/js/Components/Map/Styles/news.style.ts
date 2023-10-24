import {Circle, Fill, Style} from "ol/style";

const width = 5;

export const newsStyle: Style = new Style({
    image: new Circle({
        radius: width * 2,
        fill: new Fill({
            color: "#322FCD",
        }),
    }),
    zIndex: Infinity,
});

export const disabledNewsStyle: Style = new Style({
    image: new Circle({
        radius: width * 2,
        fill: new Fill({
            color: "#625F5F",
        }),
    }),
    zIndex: Infinity,
});
