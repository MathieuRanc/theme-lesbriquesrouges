import Vue from 'vue';
import Router from 'vue-router';

// Components
import Home from '../pages/index.vue';
import Post from '../pages/_post.vue';
import Page from '../pages/_page.vue';

Vue.use(Router);

const router = new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home,
    },
    {
      // Assuming you're using the default permalink structure for posts
      path: '/:year/:month/:day/:post',
      name: 'Post',
      component: Post,
    },
    {
      path: '/:page',
      name: 'Page',
      component: Page,
    },
  ],
  mode: 'history',
  base: '',

  // Prevents window from scrolling back to top
  // when navigating between components/views
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    } else {
      return { x: 0, y: 0 };
    }
  },
});

router.afterEach((to) => { // (to, from)
  // Add a body class specific to the route we're viewing
  let body = document.querySelector('body');

  const slug = !(to.params.postSlug)
    ? to.params.pageSlug
    : to.params.postSlug;
  body.classList.add('vue--page--' + slug);
});

export default router;
