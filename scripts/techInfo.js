$(document).ready(function() {
    $('#tree').tree({
      uiLibrary: 'bootstrap4',
      dataSource: [
        { text: 'Software requirements and recommendations', children: [ { text: 'Opeartion System', children: [ { text: 'WIN10' }, { text: 'IOS' } ] }, { text: 'Visual Studio' },  { text: 'Android Studio' } ] },
        { text: 'Computer requirements and recommendations', children: [ { text: 'Harddrive 1TB' },  { text: '8GB RAM' },  { text: 'Easy to Carry' } ] },
        { text: 'Web Services requirements', children: [ { text: 'AWS' },  { text: 'GitHub' },  { text: 'Mlab' }, { text: 'Azure' },{ text: 'HeroKu' }] },
        { text: 'Dev environment setup recommendations or requirements', children: [ { text: 'Visual Studio Code' },  { text: 'Visual Studio 2017' },  { text: 'GitHub Desktop' } ] }
      ],
      width: 500
      
    });
});