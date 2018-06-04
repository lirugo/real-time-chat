<template>
    <div v-if="conversation">
        <ul class="list-inline" v-if="conversation.users.data.length">
            <li class="list-inline-item"><strong>In conversation:</strong></li>
            <li class="list-inline-item" v-for="user in conversation.users.data">{{ user.name }}</li>
            <hr>
        </ul>

        <div class="media" v-for="reply in conversation.replies.data" style="padding-top: 10px;">
            <div class="media-left" style="padding-right: 10px;">
                <img v-bind:src="reply.user.data.avatar" v-bind:alt="reply.user.data.name"/>
            </div>
            <div class="media-body">
                <p>{{ reply.user.data.name }} &bull; {{ reply.created_at_human }}</p>
                <div class="card card-default">
                    <div class="card-body">
                        {{ reply.body }}
                    </div>
                </div>
            </div>
        </div>

        <div class="media" style="padding-top: 10px;">
            <div class="media-left" style="padding-right: 10px;">
                <img v-bind:src="conversation.user.data.avatar" v-bind:alt="conversation.user.data.name"/>
            </div>
            <div class="media-body">
                <p>{{ conversation.user.data.name }} &bull; {{ conversation.created_at_human }}</p>
                <div class="card card-default">
                    <div class="card-body">
                        {{ conversation.body }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'

    export default {
        computed: mapGetters({
            conversation: 'currentConversation',
        }),
    }
</script>
