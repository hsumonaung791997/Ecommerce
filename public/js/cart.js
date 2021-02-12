let array = [
    { id: 1 , name: "Item One" , price: 5000 , qty: 1, photo: 'url'},
    { id: 2 , name: "Item Two" , price: 5400 , qty: 1, photo: 'url'}
];

localStorage.setItem('cart', JSON.stringify(array));
