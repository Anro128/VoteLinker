import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Dashboard({ auth }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="Dashboard" />
            <div className="pt-12 mx-[20vh]">   
                <div className='md:mx-0 flex justify-center mt-10 flex-col m-[100px] mb-0 items-center'>
                    <div className='flex justify-center flex-col items-center gap-2'>
                        <h2 className='text-4xl'>About VoteLinker</h2>
                        <p>Revolutionazing online election since 2023</p>
                        <br></br>
                        <img src='/assets/Separator.png'></img>
                    </div>
                    <div className='md:container mx-10 justify-center items-center flex gap-5
                                    md:flex-col'>
                        <div>
                            <img className='container md:min-w-[200px] max-w-[500px]' src='/assets/using-laptop.jpg.png'></img>
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
                            <h1 className='container md:text-2xl lg:text-3xl xl:text-4xl'>Our Clients</h1>
                        </div>
                        <div className='container flex gap-5 justify-center
                                        lg:max-w-[70px]
                                        xl:max-w-[95px] 
                                        md:max-w-10'>
                            <img src='/assets/bemC1.png'></img>
                            <img src='/assets/logobemkm1.png'></img>
                            <img src='/assets/bemJ1.png'></img>
                            <img src='/assets/bemI1.png'></img>
                            <img src='/assets/bemA1.png'></img>
                            <img src='/assets/bemB1.png'></img>
                            <img src='/assets/bemD1.png'></img>
                            <img src='/assets/bemE1.png'></img>
                            <img src='/assets/bemF1.png'></img>
                            <img src='/assets/bemG1.png'></img>
                            <img src='/assets/bemH1.png'></img>
                            <img src='/assets/bemK1.png'></img>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
