import Default from './modules/default';

export default function routes(router) {
  const requireModules = require.context('./modules', false, /\.js$/);
  requireModules.keys().forEach(fileName => {
    if (fileName === './default.js') {
      return;
    }
    let routeList = requireModules(fileName).default;
    routeList.forEach((route) => {
      router.addRoute(route);
    })
  });
  Default.forEach((route) => {
    router.addRoute(route);
  })
}