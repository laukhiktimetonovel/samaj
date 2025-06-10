// async function loadSidebar() {
//     try {
//         const res = await fetch('./js/sidebar.php'); // Make sure this is correct
//         if (!res.ok) throw new Error('Sidebar file not found');

//         const html = await res.text();

//         const container = document.getElementById('sidebar-container');
//         container.innerHTML = html;

//         console.log('Sidebar loaded.');

//         const currentPage = window.location.pathname.split('/').pop();
//         container.querySelectorAll('#sidebar a').forEach(link => {
//             const matches = (link.dataset.match || '').split(',');
//             if (matches.includes(currentPage)) {
//                 link.classList.add('page-active');
//             }
//         });
//     } catch (err) {
//         console.error('Sidebar load error:', err);
//         document.getElementById('sidebar-container').innerHTML =
//             '<p class="text-red-500 p-4">Sidebar load કરવા માં નિષ્ફળ.</p>';
//     }
// }

// loadSidebar();

// const skeletonGrid = document.getElementById("skeleton-grid");

//   for (let i = 0; i < 12; i++) {
//     const item = document.createElement("div");
//     item.className =
//       "animate-pulse bg-gray-200 rounded-[10px] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 py-2 md:py-3 px-2 min-h-[100px]";
    
//     item.innerHTML = `
//       <div class="bg-gray-300 w-[30px] h-[30px] md:h-[40px] md:w-[40px] rounded"></div>
//       <div class="bg-gray-300 h-4 w-24 rounded mt-1"></div>
//     `;

//     skeletonGrid.appendChild(item);
//   }

// const currentPage = window.location.pathname.split('/').pop();

// document.querySelectorAll('#sidebar a').forEach(link => {
//   const matches = (link.dataset.match || '').split(',');
//   if (matches.includes(currentPage)) {
//     link.classList.add('page-active');
//   }
// })

if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('{{ asset("service-worker.js") }}')
      .then(registration => console.log('Service Worker registered:', registration))
      .catch(err => console.log('Service Worker registration failed:', err));
  });
}