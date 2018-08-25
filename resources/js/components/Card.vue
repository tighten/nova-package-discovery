<template>
    <card>
        <div class="px-3 py-3">
            <h1 class="text-xs text-60 uppercase float-right">NovaPackages.com</h1>

            <div class="uppercase text-sm border-b border-60">
                <a href="#" class="px-2 py-2 inline-block no-underline text-90 hover:bg-30" @click.prevent="selectTab('recent')" :class="{'font-bold': tab === 'recent'}">Recent</a>
                <a href="#" class="px-2 py-2 inline-block no-underline text-90 hover:bg-30" @click.prevent="selectTab('popular')" :class="{'font-bold': tab === 'popular'}">Popular</a>
                <a href="#" class="px-2 py-2 inline-block no-underline text-90 hover:bg-30" @click.prevent="selectTab('stats')" :class="{'font-bold': tab === 'stats'}">Stats</a>
            </div>

            <div v-show="tab === 'recent'" class="mt-4">
                <h2 class="text-base">Recent packages</h2>
                <ul class="leading-normal">
                    <li v-for="package in recentPackages" class="text-sm">
                        <a :href="package.novapackages_url">{{ package.name }}</a> - <span class="text-70 italic">{{ humanTime(package.created_at) }}</span>
                    </li>
                </ul>
            </div>

            <div v-show="tab === 'popular'" class="mt-4">
                <h2 class="text-base">Popular packages</h2>
                <ul class="leading-normal">
                    <li v-for="package in popularPackages" class="text-sm">
                        <a :href="package.novapackages_url">{{ package.name }}</a> - <span class="text-70 italic">{{ humanTime(package.created_at) }}</span>
                    </li>
                </ul>
            </div>

            <div v-show="tab === 'stats'" class="mt-4">
                Number of packages: @todo<br>
                Total number of downloads: @todo<br>
                Total number of GitHub stars: @todo<br>
                Latest version of Nova: @todo<br>
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
