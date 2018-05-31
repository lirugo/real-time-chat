<template>
    <div class="card">
        <div class="card-header">All conversations</div>
        <div class="card-body">
            <div class="media" v-for="conversation in conversations">
                <div class="media-body">
                    <a href="#">{{ conversation.body }}</a>
                    <p class="text-muted">
                        You and {{ conversation.participant_count }} other
                    </p>
                    <ul class="list-inline">
                        <li>
                            <img :src="user.avatar" :title="user.name" :alt="user.name + 'avatar'" v-for="user in conversation.users.data">
                        </li>
                        <small>Last reply {{ conversation.last_reply_human }}</small>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'

    export default {
        computed: mapGetters({
            conversations: 'allConversations',
        }),
        methods: {
            ...mapActions([
                'getConversations'
            ])
        },
        mounted() {
            console.log('Component mounted.');
            this.getConversations(1);
        },
    }
</script>
