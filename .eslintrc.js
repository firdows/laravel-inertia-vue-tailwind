module.exports = {
    root: true,
    env: {
        browser: true,
        es2021: true,
        node: true,
    },
    extends: [
        'eslint:recommended',
        'plugin:vue/vue3-recommended',
        '@vue/eslint-config-standard',
        'plugin:prettier/recommended'
    ],
    parserOptions: {
        ecmaVersion: 2021,
        sourceType: 'module',
    },
    rules: {
        // ปรับแต่งกฎตามที่ต้องการ เช่น
        'vue/multi-word-component-names': 'off', // ปิดการบังคับใช้ชื่อคอมโพเนนต์หลายคำ
        'no-console': 'warn',
        'no-debugger': 'warn',
        'prettier/prettier': ['error', {
            singleQuote: true,
            semi: false
        }],
    },
};
