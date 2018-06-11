<template>
    <div class="card card-default">
        <div class="card-header">New message</div>
        <div class="card-body">
            <div class="form-group">
                <input type="text" id="users" placeholder="Start typing for find users" class="form-control"/>
            </div>
        </div>
    </div>
</template>

<script>
    import {userautocomplete} from '../../helpers/autocomplete'
    export default {
        mounted(){
            userautocomplete('#users')
        }
    }
</script>