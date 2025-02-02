<template>
    <div>
        <h1>{{ title }}-111</h1>
        <form>
            First name:<br>
            <input type="text" name="firstname"><br>
            Last name:<br>
            <input type="text" name="lastname">
        </form>
    </div>
</template>

<script setup>
defineProps({
    title: String
})
</script>