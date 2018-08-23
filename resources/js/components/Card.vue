<template>
    <card class="">
        <div class="px-3 py-3">
            <h1 class="text-center text-sm text-80 uppercase">NovaPackages.com</h1>
            <h2 class="text-base mt-4">Recent packages</h2>
            <ul>
                <li v-for="package in recentPackages" class="text-sm">
                    {{ package.name }}
                </li>
            </ul>

            <h2 class="text-base mt-4">Popular packages</h2>
            <ul>
                <li v-for="package in popularPackages" class="text-sm">
                    {{ package.name }}
                </li>
            </ul>
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
        };
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
