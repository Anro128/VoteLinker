import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Dashboard({ auth }) {
    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Dashboard" />
            <div className="pt-12 mx-auto max-w-screen min-w-screen">
                <div className='flex flex-col justify-center items-center my-10 px-5'>
                    <div className='text-center mb-10'>
                        <h2 className='text-4xl font-bold'>About VoteLinker</h2>
                        <p className='text-lg text-gray-700 mt-2'>Revolutionizing online elections since 2023</p>
                        <img src='/assets/Separator.png' className='my-4 animate-fadeIn'></img>
                    </div>
                    <div className='flex flex-col md:flex-row justify-center items-center gap-8'>
                        <img className='md:max-w-sm w-full rounded shadow-lg animate-fadeInLeft' src='/assets/using-laptop.jpg.png' alt='Using Laptop'></img>
                        <div className='flex flex-col gap-5 text-justify max-w-lg animate-fadeInRight'>
                            <p className='text-gray-600'>VoteLinker is an election system that invites voters to record their votes and secret ballots electronically.</p>
                            <p className='text-gray-600'>It has a friendly user interface and allows voters to cast their votes in a few simple steps. VoteLinker is a reliable, comprehensive, and accessible eVote voting model.</p>
                            <p className='text-gray-600'>It provides a simple and accessible voter experience that easily combines multiple engagements around voting.</p>
                            <p className='text-gray-600'>VoteLinker is available throughout the Student Executive Board in each faculty at IPB University to carry out seamless electronic voting with the highest security and integrity.</p>
                        </div>
                    </div>
                    <div className='flex flex-col justify-center items-center mt-10 bg-[#CFD8DC] p-8 w-screen gap-5'>
                        <h1 className='text-3xl font-bold text-center animate-fadeIn'>Our Clients</h1>
                        <div className='flex flex-wrap justify-center gap-5 mt-5'>
                            <img className='h-16 animate-zoomIn' src='/assets/bemC1.png' alt='Client Logo'></img>
                            <img className='h-16 animate-zoomIn' src='/assets/logobemkm1.png' alt='Client Logo'></img>
                            <img className='h-16 animate-zoomIn' src='/assets/bemJ1.png' alt='Client Logo'></img>
                            <img className='h-16 animate-zoomIn' src='/assets/bemI1.png' alt='Client Logo'></img>
                            <img className='h-16 animate-zoomIn' src='/assets/bemA1.png' alt='Client Logo'></img>
                            <img className='h-16 animate-zoomIn' src='/assets/bemB1.png' alt='Client Logo'></img>
                            <img className='h-16 animate-zoomIn' src='/assets/bemD1.png' alt='Client Logo'></img>
                            <img className='h-16 animate-zoomIn' src='/assets/bemE1.png' alt='Client Logo'></img>
                            <img className='h-16 animate-zoomIn' src='/assets/bemF1.png' alt='Client Logo'></img>
                            <img className='h-16 animate-zoomIn' src='/assets/bemG1.png' alt='Client Logo'></img>
                            <img className='h-16 animate-zoomIn' src='/assets/bemH1.png' alt='Client Logo'></img>
                            <img className='h-16 animate-zoomIn' src='/assets/bemK1.png' alt='Client Logo'></img>
                        </div>
                    </div>
                    <div className='flex flex-col justify-center items-center mt-10'>
                        <h2 className='text-3xl font-bold animate-fadeIn'>Why Choose VoteLinker?</h2>
                        <p className='text-lg text-gray-700 mt-2 max-w-xl text-center animate-fadeIn'>Our platform ensures a secure, transparent, and efficient voting process. Here’s why VoteLinker stands out:</p>
                        <ul className='list-disc text-left mt-4 space-y-2 max-w-lg text-gray-600'>
                            <li className='animate-fadeInLeft'>Highly secure with end-to-end encryption</li>
                            <li className='animate-fadeInRight'>User-friendly interface for ease of use</li>
                            <li className='animate-fadeInLeft'>Real-time vote counting and results</li>
                            <li className='animate-fadeInRight'>Accessibility features for all users</li>
                            <li className='animate-fadeInLeft'>Comprehensive support and training</li>
                        </ul>
                    </div>
                    <div className='flex flex-col justify-center items-center mt-10 bg-blue-100 p-8 w-screen animate-fadeIn'>
                        <h2 className='text-3xl font-bold'>Get in Touch</h2>
                        <p className='text-lg text-gray-700 mt-2 text-center'>Have questions or need support? Contact us at:</p>
                        <p className='text-lg text-gray-800 mt-2'><a href='mailto:support@votelinker.com' className='text-blue-600 underline'>support@votelinker.com</a></p>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
