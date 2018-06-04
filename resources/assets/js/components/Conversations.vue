<template>
    <div class="card">
        <div class="card-header">All conversations</div>
        <div class="card-body">
            <div class="loader" v-if="loading"></div>
            <div class="media" v-for="conversation in conversations" v-else-if="conversations.length">
                <div class="media-body">
                    <a href="#" @click.prevent="getConversation(conversation.id)">{{ trunc(conversation.body, 50) }}</a>
                    <p class="text-muted">
                        You and {{ conversation.participant_count }} {{ pluralize('other', conversation.participant_count) }}
                    </p>
                    <ul class="list-inline">
                        <li>
                            <img :src="user.avatar" :title="user.name" :alt="user.name + 'avatar'" v-for="user in conversation.users.data">
                        </li>
                        <small>Last reply {{ conversation.last_reply_human }}</small>
                        <hr>
                    </ul>
                </div>
            </div>
            <div v-else>No conversations</div>
        </div>
    </div>
</template>

<script>
    import trunc from '../helpers/trunc'
    import pluralize from 'pluralize'
    import { mapActions, mapGetters } from 'vuex'

    export default {
        computed: mapGetters({
            conversations: 'allConversations',
            loading: 'loadingConversations',
        }),
        methods: {
            ...mapActions([
                'getConversations',
                'getConversation',
            ]),
            trunc: trunc,
            pluralize: pluralize
        },
        mounted() {
            console.log('Component mounted.');
            this.getConversations(1);
        },
    }
</script>
