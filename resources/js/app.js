import "./bootstrap";

import Alpine from "alpinejs";

import subscribeComponent from "./components/subscribe";

import chargeComponent from "./components/charge";

window.Alpine = Alpine;

Alpine.data("subscribe", subscribeComponent);

Alpine.data("charge", chargeComponent);

Alpine.start();
