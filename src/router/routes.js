const routes = [
  {
    path: "/",
    component: () => import("pages/Login.vue"),
    children: [
      { path: "", component: () => import("pages/Login.vue") },
      { path: "/login", component: () => import("pages/Login.vue") },
    ],
  },
  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      { path: "", component: () => import("pages/Index.vue") },
      { path: "/confirm", component: () => import("pages/Saleconfirm.vue") },
      { path: "/dpm", component: () => import("pages/Dpmapprove_mock.vue") },
      { path: "/test", component: () => import("pages/Test.vue") },
    ],
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/Error404.vue"),
  },
];

export default routes;
