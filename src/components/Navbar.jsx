import React from 'react'
import { Link } from 'react-router-dom'

const Navbar = () => {
  return (
    <nav className='bg-red-600 py-3 px-[80px] flex gap-5'>
        <Link className='text-white text-xl font-bold hover:text-gray-300' to="/">Home</Link>
        <Link className='text-white text-xl font-bold hover:text-gray-300' to="/content">Content</Link>
        <Link className='text-white text-xl font-bold hover:text-gray-300' to="/about">About</Link>
        <Link className='text-white text-xl font-bold hover:text-gray-300' to="/contact">Contact</Link>
        <Link className='text-white text-xl font-bold hover:text-gray-300' to="/location">Location</Link>
    </nav>
  )
}

export default Navbar