import './bootstrap';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm.js'
import humanDate from "./directives/humanDate.js";

Alpine.directive('human-date', humanDate)

Livewire.start()
