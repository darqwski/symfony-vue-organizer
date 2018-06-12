<template>
    <div class="main-grid-container">
        <notepadLeft></notepadLeft>
        <notepadRight></notepadRight>
    </div>

</template>

<script>
    import notepadLeft from "./notepadLeft";
    import notepadRight from "./notepadRight";

export default {
        name: "notepadApp",
    components: {notepadLeft,notepadRight}
}
</script>

<style>

</style>