<template>
	<div>
		<h3><slot></slot></h3>
		<ul v-if="allPagesLoaded">
			<li v-for="page in somePages(limit)" :key="page.id">
				<router-link :to="page.slug" tag="div">
					<div title="Woman holding a mug">Wooman holding a mug</div>
					<div>
						<div>
							<div>{{ page.title.rendered }}</div> <p v-html="page.excerpt.rendered"></p>
						</div>
						<div>
							<img src="https://res.cloudinary.com/evanagee/image/upload/c_fit,w_50/v1551277265/evanagee.com/evan-2018.jpg" alt="Avatar of Jonathan Reinink" />
							<div><p>Aug 18</p></div></div
						>
					</div>
				</router-link>
			</li>
		</ul>
		<div v-else>Loading...</div>
	</div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
	props: ['limit'],
	computed: {
		...mapGetters({
			somePages: 'somePages',
			allPagesLoaded: 'allPagesLoaded',
		}),
	},

	mounted() {},
};
</script>
