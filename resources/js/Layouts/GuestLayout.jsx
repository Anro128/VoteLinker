import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';
import Footer from '@/Components/Footer'


export default function Guest({ children }) {
    return (
    <>    
        <div className='min-h-[900px] bg-[#183459]'> 
            <div className="min-h-[990px] flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[url('/assets/background.svg')]">
                <div>
                    <Link href="/">
                        <img src='/assets/votelinker_logo.png'></img>
                    </Link>
                </div>

                <div className="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {children}
                </div>
            </div>
            <Footer />
        </div>
    </>    
    );
}
