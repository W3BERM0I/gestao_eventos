module.exports = {
  root: true,
  env: {
    node: true,
  },
  extends: ["plugin:vue/vue3-essential", "eslint:recommended"],
  Plugins: ["vue"],
  rules: {
    'vue/multi-word-component-names': 'off',
    quotes: ["error", "single"],
    indent: ["error", 4],
    "comma-spacing": ["error", { before: false, after: true }],
    "vue/no-multi-spaces": 0,
    'vue/comment-directive': 'off'
  },
};