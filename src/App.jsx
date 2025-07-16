import React from 'react'
import Header from './components/Header'
import Navbar from './components/Navbar'
import { BrowserRouter, Route, Routes } from 'react-router-dom'
import Home from './components/Home'
import Content from './components/Content'
const App = () => {
  return (
    <>
    <Header/>
    <BrowserRouter>
      <Navbar/>
      <Routes>
        <Route path='/' element={<Home/>} ></Route>
        <Route path='/content' element={<Content/>} ></Route>
      </Routes>
    </BrowserRouter>
    
    
    
    </>
  )
}

export default App