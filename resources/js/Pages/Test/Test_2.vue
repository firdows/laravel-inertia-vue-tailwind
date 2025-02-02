<template>
    <div>
        <h1>{{ title }}-2222</h1>
        <div>
            <label for="test">One</label>
            <input type="radio" name="test" id="test" />
            <label for="test">two</label>
            <input type="radio" name="test" id="test" />
        </div>
    </div>
</template>

<script setup>
defineProps({
    title: String
})
</script>