module.exports = {
    root: true,
    env: {
        node: true,
    },
    extends: [
        "eslint:recommended",
        "plugin:vue/vue3-recommended",
        "@vue/eslint-config-typescript/recommended",
    ],
    rules: {
        indent: ["error", 4],
        semi: ["error", "always"],
        quotes: ["error", "double"],
        "vue/multi-word-component-names": "off",
        // "comma-spacing": ["error", { before: false, after: true }],
        "@typescript-eslint/ban-ts-comment": 0,
    },
};
