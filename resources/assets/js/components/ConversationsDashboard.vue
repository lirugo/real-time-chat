<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <conversation-form></conversation-form>
                <conversations style="margin-top: 25px"></conversations>
            </div>
            <div class="col-md-7">
                <conversation :id="id"></conversation>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            'id': {
                default: null
            }
        }
    }
</script>
