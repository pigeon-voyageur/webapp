import {Circle, Fill, Style} from "ol/style";

const width = 5;

export const newsStyle = new Style({
    image: new Circle({
        radius: width * 2,
        fill: new Fill({
            color: "#322FCD",
        }),
    }),
    zIndex: Infinity,
});
