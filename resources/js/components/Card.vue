<template>
    <card>
        <div class="px-3 py-3">
            <h1 class="text-center text-sm text-80 uppercase">NovaPackages.com</h1>

            <div>
                <a href="#" @click.prevent="selectTab('recent')" :class="{'font-bold': tab === 'recent'}">Recent</a> |
                <a href="#" @click.prevent="selectTab('popular')" :class="{'font-bold': tab === 'popular'}">Popular</a>
            </div>

            <div v-show="tab === 'recent'">
                <h2 class="text-base mt-4">Recent packages</h2>
                <ul class="leading-normal">
                    <li v-for="package in recentPackages" class="text-sm">
                        <a :href="package.url">{{ package.name }}</a> - <span class="text-70 italic">{{ humanTime(package.created_at) }}</span>
                        <!-- @todo get the novapackages.com URL and link it here -->
                    </li>
                </ul>
            </div>

            <div v-show="tab === 'popular'">
                <h2 class="text-base mt-4">Popular packages</h2>
                <ul class="leading-normal">
                    <li v-for="package in popularPackages" class="text-sm">
                        {{ package.name }}
                    </li>
                </ul>
            </div>
        </div>
    </card>
</template>

<script>
export default {
    props: ['card'],

    data: () => {
        return {
            recentPackages: [],
            popularPackages: [],
            tab: 'recent'
        };
    },

    methods: {
        humanTime: function(string) {
            if (string) {
                return moment.utc(string).fromNow();
            }
            return 'Nothing yet.';
        },
        selectTab: function(tab) {
            this.tab = tab;
        },
    },

    mounted() {
        Nova.request().get('/nova-vendor/nova-package-discovery/recent-packages').then(response => {
            this.recentPackages = response.data;
        });

        Nova.request().get('/nova-vendor/nova-package-discovery/popular-packages').then(response => {
            this.popularPackages = response.data;
        });
    },
}
</script>

<style scoped>
.card {
    height: 19em;
}
</style>
