<template>
	<div>
		<!-- {{ menu }} -->
		<router-link v-for="item in menu.items" :key="item.ID" :to="item.url">
			{{ item.title }}
		</router-link>
	</div>
</template>

<script>
import axios from 'axios';
export default {
	data() {
		return {
			menu: null,
		};
	},
	beforeMount() {
		this.fetchMenu();
	},
	methods: {
		fetchMenu() {
			axios
				.get('/wp-json/menus/v1/menus/menu')
				.then((response) => (this.menu = response.data))
				.catch((e) => console.log(e));
			console.log(this.menu);
		},
	},
};
</script>

<style lang="scss" scoped></style>
