<template lang="">
    <div class="border p-4 border-gray-200 dark:border-gray-900 rounded-md shadow-sm dark:text-gray-300 bg-gray-100 dark:bg-gray-800">
        <div class="text-gray-400 font-medium text-xs">
            <slot name="header" />
        </div>
        <slot />
    </div>
</template>
<script>
export default {};
</script>
<style lang="">
</style>