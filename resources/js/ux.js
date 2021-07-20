import {Modal} from 'bootstrap';

let loaderTimeout = null;
let loaderElement = document.getElementById('ux-loader');
let modalElement = document.getElementById('ux-modal');

Livewire.hook('message.sent', () => {
    if (loaderTimeout != null) {
        return;
    }

    loaderTimeout = setTimeout(() => {
        loaderElement.classList.add('show');
    }, 1000);
});

Livewire.hook('message.received', () => {
    if (loaderTimeout == null) {
        return;
    }

    loaderElement.classList.remove('show');
    clearTimeout(loaderTimeout);
    loaderTimeout = null;
});

Livewire.on('showBootstrapModal', () => {
    Modal.getOrCreateInstance(modalElement).show();
});

Livewire.on('hideModal', () => {
    Modal.getOrCreateInstance(modalElement).hide();
});

modalElement.addEventListener('hidden.bs.modal', () => {
    Livewire.emit('resetModal');
});
