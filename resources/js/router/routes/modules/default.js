import complete_page from "../../../pages/complete_page";
import identify_page from "../../../pages/identify_page";
import registration_page from "../../../pages/registration_page";
import start_page from "../../../pages/start_page";
import success_page from "../../../pages/success_page";
import verification_page from "../../../pages/verification_page";
import Page404 from "../../../pages/404"

export default [
  {
    path: '/',
    redirect: '/start_page',
    meta: {auth: false},
  },
  {
    name: 'complete_page',
    path: '/complete_page',
    component: complete_page,
    meta: {auth: false},
  },
  {
    name: 'identify_page',
    path: '/identify_page',
    component: identify_page,
    meta: {auth: false},
  },
  {
    name: 'registration_page',
    path: '/registration_page',
    component: registration_page,
    meta: {auth: false},
  },
  {
    name: 'start_page',
    path: '/start_page',
    component: start_page,
    meta: {auth: false},
  },
  {
    name: 'success_page',
    path: '/success_page',
    component: success_page,
    meta: {auth: false},
  },
  {
    name: 'verification_page',
    path: '/verification_page',
    component: verification_page,
    meta: {auth: false},
  },
  {
    name: 'error',
    path: '*',
    component: Page404,
    meta: {auth: true},
  },
]