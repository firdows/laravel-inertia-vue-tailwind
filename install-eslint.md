https://github.com/piotr-jura-udemy/master-laravel-vue-fullstack/commit/27e72c59d686364e37a6a138ea075570be7ba587#diff-7fe0ab2d61296b5df4add971654584ba7ee8082cc5b79ffa3b60da0ed9f0b3eb

1. Create File  jsconfig.json
    ```
    {
        "compilerOptions": {
        "baseUrl": ".",
        "paths": {
            "@/*": [
            "resources/js/*"
            ]
        },
        "jsx": "preserve",
        },
        "exclude": [
        "node_modules",
        "public"
        ]
    }
    ```

2. Install ESLint
    ```
    npm install --save-dev eslint eslint-plugin-vue
    ```

3. Create file .eslintrc.js
    ```
    module.exports = {
        extends: ['eslint:recommended', 'plugin:vue/vue3-recommended'],
        parserOptions: {
            ecmaVersion: 2020,
            sourceType: 'module',
        },
        env: {
            amd: true,
            browser: true,
            es6: true,
        },
        rules: {
            indent: ['error', 2],
            quotes: ['warn', 'single'],
            semi: ['warn', 'never'],
            'no-unused-vars': ['error', { vars: 'all', args: 'after-used', ignoreRestSiblings: true }],
            'comma-dangle': ['warn', 'always-multiline'],
            'vue/multi-word-component-names': 'off',
            'vue/max-attributes-per-line': 'off',
            'vue/no-v-html': 'off',
            'vue/require-default-prop': 'off',
            'vue/singleline-html-element-content-newline': 'off',
            'vue/html-self-closing': [
            'warn',
            {
                html: {
                void: 'always',
                normal: 'always',
                component: 'always',
                },
            },
            ],
            'vue/no-v-text-v-html-on-component': 'off',
        },
        }
    ```

4. Create folder .vscode and file  settings.json
    ```
    {
        "eslint.validate":[
            "javascript",
            "javascriptvue",
            "vue",        
        ],
        "eslint.format.enable": true,
        "editor.codeActionsOnSave": {
            "source.fixAll.eslint": true
        }    
    }
    ```

5. Update file packege.json and Run
    ```
    "scripts": {
        "build": "vite build",
        "dev": "vite",
        "fix:eslint":"eslint --ext .js,.vue resources/js/ --fix"
    },
    ```
    Run
    ```
    npm run fix:eslint
    ```
    

