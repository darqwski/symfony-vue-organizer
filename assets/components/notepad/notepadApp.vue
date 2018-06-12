<template>
    <div class="main-grid-container">
        <notepadLeft></notepadLeft>
        <notepadRight></notepadRight>
    </div>

</template>

<script>
    import notepadRight from "./notepadRight";
    import notepadLeft from "./notepadLeft";

export default {
        name: "notepadApp",
    components: {notepadLeft,notepadRight}
}
</script>

<style>

</style>