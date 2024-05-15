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
            <div className="text-black/50 bg-[#183459] dark:text-white/50 overflow-hidden" >
                <div className="'relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                    <div className="relative w-full">
                        <header className="flex items-center py-2 bg-[#282D56] justify-between w-full pl-20 pr-20">
                            <div className="flex lg:justify-center lg:col-start-2 w-[150px]">
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
                            <div className="min-h-[900px] flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[url('/assets/background.svg')] bg-center bg-cover">
                                <h1 className='text-white text-5xl font-bold items-center'>VoteLinker - “Your Voice, Your Choice!”</h1>
                                <p className='font-italic text-slate-400'>Give your voice for an increasingly powerful IPB!</p> 
                                <Link href={route('register')}>
                                    <button className='mt-10 font-sans bg-[#F08200] p-3 text-white rounded-md transition duration-75 ease-in-out 
                                                    hover:bg-[#ffbf70] hover:scale-110'>LET'S GET STARTED</button>
                                </Link>   
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
