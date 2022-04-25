<template>
    <nav>
    <ul>
      <li><Link href="/">Home</Link></li>
      <li><Link href="/users">Users</Link></li>
      <li><Link href="/settings">Settings</Link></li>
    </ul>
  </nav> 
</template>

<script>
import { Link } from '@inertiajs/inertia-vue'
export default {
    name: 'Nav',
    components: { Link }
}
</script>

<style>

</style>