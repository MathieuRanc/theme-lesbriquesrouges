<template>
	<nav class="site-header">
		<div>
			<router-link to="/"> Logo LBR </router-link>
		</div>
		<div>
			<button> Burger Menu </button>
		</div>
		<div>
			<Navbar />
			<div>
				<a href="https://tailwindcss.com/docs/installation" target="_blank">Tailwind Docs</a>
			</div>
		</div>
	</nav>
</template>

<script>
import Navbar from './Navbar.vue'
export default {
	components: {
		Navbar,
	},
};
</script>

<style type="postcss" scoped>
.logo-cls-1 {
	fill: #ffffff;
}

.site-header {
	background: linear-gradient(to right, #92025f, #3b1e58);
}
</style>
