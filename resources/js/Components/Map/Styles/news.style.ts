import {Circle, Fill, Style} from "ol/style";
import tailwindConfig from "../../../../../tailwind.config.js";

const width = 5;

export const newsStyle = new Style({
    image: new Circle({
        radius: width * 2,
        fill: new Fill({
            color: tailwindConfig.theme.colors.blue,
        }),
    }),
    zIndex: Infinity,
});
