import "./bootstrap";

import Alpine from "alpinejs";

import subscribeComponent from "./components/subscribe";

window.Alpine = Alpine;

Alpine.data("subscribe", subscribeComponent);

Alpine.start();
