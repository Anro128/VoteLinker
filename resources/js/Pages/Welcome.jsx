import { Link, Head } from '@inertiajs/react';
import Footer from '@/Components/Footer'

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    const handleImageError = () => {
        document.getElementById('screenshot-container')?.classList.add('!hidden');
        document.getElementById('docs-card')?.classList.add('!row-span-1');
        document.getElementById('docs-card-content')?.classList.add('!flex-row');
        document.getElementById('background')?.classList.add('!hidden');
    };

    return (
        <>
            <Head title="Welcome" />
            <div className="text-black/50 dark:bg-[#183459] dark:text-white/50 overflow-hidden" >
                <div className="'relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                    <div className="relative w-full">
                        <header className="flex items-center py-2 bg-[#282D56] justify-between w-full">
                            <div className="flex lg:justify-center lg:col-start-2">
                                <img src="assets/votelinker_logo.png"></img>
                            </div>
                            <nav className="flex justify-between">
                                {auth.user ? (
                                    <Link
                                        href={route('dashboard')}
                                        className="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </Link>
                                ) : (
                                    <>
                                        <Link
                                            href={route('login')}
                                            className="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Log in
                                        </Link>
                                        <Link
                                            href={route('register')}
                                            className="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </Link>
                                    </>
                                )}
                            </nav>
                        </header>
                        <main className='overflow-hidden'>
                            <div className='min-h-[800px] flex flex-col justify-center items-center gap-5'>
                                <h1 className='text-white text-5xl font-bold items-center'>VoteLinker - “Your Voice, Your Choice!”</h1>
                                <p className='font-italic'>Give your voice for an increasingly powerful IPB!</p> 
                                <button className='mt-10 font-sans bg-[#F08200] p-3 text-white rounded-md hover:bg-white'>LET'S GET STARTED</button>   
                            </div>
                        </main>
                        <footer>
                            <Footer />
                        </footer>
                    </div>
                </div>
            </div>
            
        </>
    );
}
