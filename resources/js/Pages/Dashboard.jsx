import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Dashboard({ auth }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="Dashboard" />

            <div className="pt-12 mx-[20vh]">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        {/* disini cok */}
                        <div className="p-6 text-gray-900">
                        
                        You're logged in!</div>
                    </div>
                </div>
                <div className='flex justify-center mt-10 flex-col m-[100px] mb-0 items-center'>
                    <div className='flex justify-center flex-col items-center gap-2'>
                        <h2 className='text-4xl'>About VoteLinker</h2>
                        <p>Revolutionazing online election since 2023</p>
                        <br></br>
                        <img src='/assets/Separator.png'></img>
                    </div>
                    <div className='mx-10 justify-center items-center flex gap-5'>
                        <div>
                            <img className='min-w-[500px]' src='/assets/using-laptop.jpg.png'></img>
                        </div>
                        <div className='flex flex-col gap-5 text-justify'>
                            <p>VoteLinker is an election system that invites voters to record their votes and secret ballots electronically.</p>
                            <p>It has a friendly user interface and allows voters to cast their votes in a few simple steps. VoteLinker is a reliable, comprehensive, and accessible eVote voting model.</p>
                            <p>It provides a Simple and Accessible voter experience that easily combines multiple engagements around voting.</p>
                            <p>VoteLinker is available throughout the Student Executive Board in each faculty at IPB University to carry out seamless electronic voting with the highest security and integrity.</p>
                        </div>
                    </div>
                    <div className='flex flex-col justify-center items-center mt-10 bg-[#CFD8DC] p-5 w-screen gap-5'>
                        <div>
                            <h1 className='text-4xl'>Our Clients</h1>
                        </div>
                        <div className='flex gap-10'>
                            <img src='/assets/bemC1.png'></img>
                            <img src='/assets/bemC1.png'></img>
                            <img src='/assets/bemC1.png'></img>
                            <img src='/assets/bemC1.png'></img>
                            <img src='/assets/bemC1.png'></img>
                            <img src='/assets/bemC1.png'></img>
                            <img src='/assets/bemC1.png'></img>
                            <img src='/assets/bemC1.png'></img>
                            <img src='/assets/bemC1.png'></img>
                            <img src='/assets/bemC1.png'></img>
                            <img src='/assets/bemC1.png'></img>
                            <img src='/assets/bemC1.png'></img>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
