/**
 * plugins/vuetify.ts
 *
 * Framework documentation: https://vuetifyjs.com`
 */

// Styles
import "@mdi/font/css/materialdesignicons.css";
import "vuetify/styles";

import {fa, aliases} from "vuetify/iconsets/fa";
import "@fortawesome/fontawesome-free/css/all.css";


// Composables
import { createVuetify } from "vuetify";

// https://vuetifyjs.com/en/introduction/why-vuetify/#feature-guides
export default createVuetify({
    theme: {
        themes: {
            light: {
                colors: {
                    primary: "#1867C0",
                    secondary: "#5CBBF6",
                },
            },
        },
    },

    icons: {
        defaultSet: "fa",
        aliases,
        sets: {
            fa,
        },
    },
});
