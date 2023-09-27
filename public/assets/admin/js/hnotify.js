
const triggerNotify = (status, message) => {
    iziToast[status]({
        message: message,
        position: "topRight"
    });
}


const triggerArrayNotify = (messages, status= 'error') => {
    messages.forEach(message => {
        triggerNotify(status, message);
    });
}
