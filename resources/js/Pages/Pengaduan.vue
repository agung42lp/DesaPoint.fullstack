<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Sidebar -->
    <div class="fixed left-0 top-0 h-full w-20 bg-teal-700 flex flex-col items-center py-4 space-y-4">
      <button class="w-12 h-12 bg-teal-600 rounded-lg flex items-center justify-center text-white">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
      <button class="w-12 h-12 rounded-lg flex items-center justify-center text-white hover:bg-teal-600">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-3zM14 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1h-4a1 1 0 01-1-1v-3z" />
        </svg>
      </button>
      <button class="w-12 h-12 rounded-lg flex items-center justify-center text-white hover:bg-teal-600">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
      </button>
      <button class="w-12 h-12 bg-white rounded-lg flex items-center justify-center text-teal-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
        </svg>
      </button>
    </div>

    <!-- Main Content -->
    <div class="ml-20 p-6">
      <!-- Header -->
      <div class="bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-400 rounded-2xl p-8 mb-6">
        <div class="flex items-center text-gray-600 text-sm mb-2">
          <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
          </svg>
          Vendors
        </div>
        <h1 class="text-5xl font-light text-gray-700">Vendors <span class="font-normal">6</span></h1>
      </div>

      <!-- Toolbar -->
      <div class="flex items-center justify-between mb-6">
        <div class="flex items-center space-x-4">
          <div class="relative">
            <input 
              type="text" 
              placeholder="Search" 
              class="w-64 pl-10 pr-4 py-2 bg-gray-100 rounded-lg text-gray-600 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-500"
            />
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
          <button class="p-2 text-gray-400 hover:text-gray-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
          </button>
          <button class="p-2 text-gray-400 hover:text-gray-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
          </button>
          <button class="p-2 text-gray-400 hover:text-gray-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
        <button class="px-6 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 flex items-center">
          <span class="text-xl mr-2">+</span>
          Add vendor
        </button>
      </div>

      <!-- Vendors Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div 
          v-for="vendor in vendors" 
          :key="vendor.id"
          class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow"
        >
          <div class="flex items-start mb-4">
            <div 
              v-if="vendor.avatar"
              class="w-12 h-12 rounded-full overflow-hidden mr-3"
            >
              <img :src="vendor.avatar" :alt="vendor.name" class="w-full h-full object-cover" />
            </div>
            <div 
              v-else
              class="w-12 h-12 rounded-lg flex items-center justify-center text-white font-semibold text-lg mr-3"
              :class="vendor.bgColor"
            >
              {{ vendor.initials }}
            </div>
            <div class="flex-1">
              <h3 class="font-semibold text-gray-800">{{ vendor.name }}</h3>
              <p class="text-sm text-gray-500">{{ vendor.type }}</p>
            </div>
          </div>
          
          <div class="flex items-center text-sm text-gray-500 mb-6">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            {{ vendor.location }}
          </div>

          <div class="grid grid-cols-3 gap-4">
            <div>
              <div class="text-2xl font-semibold text-gray-800">{{ vendor.projects }}</div>
              <div class="text-xs text-gray-500">Projects</div>
            </div>
            <div>
              <div class="text-2xl font-semibold text-gray-800">{{ vendor.events }}</div>
              <div class="text-xs text-gray-500">Events</div>
            </div>
            <div>
              <div class="text-2xl font-semibold text-gray-800">{{ vendor.contracts }}</div>
              <div class="text-xs text-gray-500">Contracts</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const vendors = ref([
  {
    id: 1,
    name: 'Seamans Furniture',
    type: 'Contractor/Service provider',
    location: 'Minneapolis IL, United States',
    initials: 'SF',
    bgColor: 'bg-blue-400',
    projects: 10,
    events: 31,
    contracts: 78,
    avatar: null
  },
  {
    id: 2,
    name: 'Iva Ryan',
    type: 'Contractor/Service provider',
    location: 'Private vendor',
    projects: 10,
    events: '',
    contracts: 78,
    avatar: 'https://i.pravatar.cc/150?img=5'
  },
  {
    id: 3,
    name: 'Stephanie Nicol',
    type: 'Contractor/Service provider',
    location: 'Private vendor',
    projects: 10,
    events: 31,
    contracts: 78,
    avatar: 'https://i.pravatar.cc/150?img=9'
  },
  {
    id: 4,
    name: 'Kith Pacheco',
    type: 'Contractor/Service provider',
    location: 'Private vendor',
    projects: 10,
    events: 31,
    contracts: 78,
    avatar: 'https://i.pravatar.cc/150?img=12'
  },
  {
    id: 5,
    name: 'Giant',
    type: 'Contractor/Service provider',
    location: 'Location',
    initials: 'G',
    bgColor: 'bg-blue-400',
    projects: 10,
    events: 31,
    contracts: 78,
    avatar: null
  },
  {
    id: 6,
    name: 'Ezhe Source',
    type: 'Contractor/Service provider',
    location: 'Location',
    initials: 'ES',
    bgColor: 'bg-blue-500',
    projects: 10,
    events: 31,
    contracts: '',
    avatar: null
  }
]);
</script>